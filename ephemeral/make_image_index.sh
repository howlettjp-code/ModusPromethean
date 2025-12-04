#!/usr/bin/env bash
#
# Generate a filename+thumbnail index PDF.
# Optionally rename images to img-01.ext, img-02.ext...
#
# Dependencies: ImageMagick (convert, montage)

set -euo pipefail

usage() {
  echo "Usage: $0 [--no-rename] <image-directory> [thumb_px]"
  exit 1
}

DO_RENAME=1

if [[ $# -lt 1 ]]; then usage; fi

# Handle optional flag
if [[ "$1" == "--no-rename" ]]; then
  DO_RENAME=0
  shift
fi

IMG_DIR="$1"
THUMB_SIZE="${2:-400}"

if [[ ! -d "$IMG_DIR" ]]; then
  echo "ERROR: '$IMG_DIR' is not a directory" >&2
  exit 1
fi

cd "$IMG_DIR"

# Collect supported images
mapfile -t FILES < <(ls -1 *.jpg *.jpeg *.png *.gif *.webp 2>/dev/null | sort || true)
if [[ ${#FILES[@]} -eq 0 ]]; then
  echo "ERROR: No images found." >&2
  exit 1
fi

if [[ "$DO_RENAME" -eq 1 ]]; then
  echo "Renaming images..."
  # Rename safely via temp names
  TMP_PREFIX="__tmp__"
  idx=1
  for f in "${FILES[@]}"; do
    ext="${f##*.}"
    mv -- "$f" "$(printf "%s%05d.%s" "$TMP_PREFIX" "$idx" "$ext")"
    ((idx++))
  done

  mapfile -t TMP < <(ls -1 ${TMP_PREFIX}* | sort)
  idx=1
  for f in "${TMP[@]}"; do
    ext="${f##*.}"
    newname=$(printf "img-%02d.%s" "$idx" "$ext")
    mv -- "$f" "$newname"
    ((idx++))
  done
fi

# Refresh list after rename or not
mapfile -t FILES < <(ls -1 img-*.* *.jpg *.jpeg *.png *.gif *.webp 2>/dev/null | sort || true)

echo "Building index rows..."

rm -f __row_*.png index.pdf || true

row_idx=1
for f in "${FILES[@]}"; do
  label="$f"

  # Make a thumbnail
  thumb="__thumb_${row_idx}.png"
  convert "$f" -thumbnail "${THUMB_SIZE}x${THUMB_SIZE}>" "$thumb"

  # Create left label cell
  label_img="__label_${row_idx}.png"
  convert -size 600x${THUMB_SIZE} xc:white -gravity West \
    -pointsize 28 -fill black -annotate +20+20 "$label" "$label_img"

  # Combine side-by-side
  row="__row_${row_idx}.png"
  convert +append "$label_img" "$thumb" "$row"

  rm "$thumb" "$label_img"
  ((row_idx++))
done

echo "Assembling final PDF..."

# Convert all rows into a single PDF
convert __row_*.png index.pdf

rm __row_*.png

echo "Done."
echo "Index written to: $(realpath index.pdf)"
