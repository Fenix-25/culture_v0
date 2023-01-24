$("#select-element").change(function() {
    const maxValue = $("option:selected", this).data("max");
    $("#input-element").attr("max", maxValue);
});