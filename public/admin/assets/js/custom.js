document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".file-upload-wrapper").forEach((wrapper) => {
        const previewImg = wrapper.querySelector(".preview-img");
        const deleteBtn = wrapper.querySelector(".delete-btn");
        const placeholder = wrapper.querySelector(".upload-placeholder");
        const input = wrapper.querySelector(".file-input");

        const srcAttr = previewImg.getAttribute("src") || "";

        if (
            previewImg &&
            srcAttr &&
            srcAttr !== "#" &&
            previewImg.style.display !== "none"
        ) {
            deleteBtn.style.display = "block";
            placeholder.style.display = "none";
            previewImg.style.display = "block";
        } else {
            previewImg.style.display = "none";
            deleteBtn.style.display = "none";
            placeholder.style.display = "block";
        }

        input.addEventListener("change", function () {
            const file = this.files[0];
            if (!file) return;

            // Your validation code here...

            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                previewImg.style.display = "block";
                deleteBtn.style.display = "block";
                placeholder.style.display = "none";
            };
            reader.readAsDataURL(file);
        });

        deleteBtn.addEventListener("click", function (e) {
            e.stopPropagation();
            input.value = "";
            previewImg.src = "#";
            previewImg.style.display = "none";
            this.style.display = "none";
            placeholder.style.display = "block";
        });
    });
});
