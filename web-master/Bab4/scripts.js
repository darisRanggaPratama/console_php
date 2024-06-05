document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("dynamic-form");
    const addButton = document.getElementById("add-field");

    addButton.addEventListener("click", function() {
        const newField = document.createElement("div");
        newField.classList.add("form-group");

        const newLabel = document.createElement("label");
        newLabel.textContent = "Additional Field";

        const newInput = document.createElement("input");
        newInput.type = "text";
        newInput.name = "additional";
        newInput.required = true;

        newField.appendChild(newLabel);
        newField.appendChild(newInput);

        form.insertBefore(newField, addButton.parentElement);

        // Apply animation to new field
        requestAnimationFrame(() => {
            newField.style.opacity = 0;
            newField.style.transform = "translateY(-20px)";
            requestAnimationFrame(() => {
                newField.style.transition = "opacity 0.5s ease, transform 0.5s ease";
                newField.style.opacity = 1;
                newField.style.transform = "translateY(0)";
            });
        });
    });
});
