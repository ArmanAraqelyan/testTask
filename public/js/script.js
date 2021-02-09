$(document).ready(function() {
    const tagSelect = $('.tag-select');
    tagSelect.select2();

    tagSelect.on('select2:select', function (e) {
        let addedElemInfo = e.params.data,
            option = addedElemInfo.element.className;
        tagSelect.find("." + option).prop('disabled', true);
    });

    tagSelect.on('select2:unselecting', function (e) {
        let removedElemInfo = e.params.args,
            option = removedElemInfo.data.element.className;
        tagSelect.find("." + option).prop('disabled', false);
    });
});
