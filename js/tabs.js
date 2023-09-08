jQuery(function($) {
    var triggerTabList = [].slice.call(document.querySelectorAll('#fopc-tabs a'))
    
    triggerTabList.forEach(function (triggerEl) {
    
        var tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })

    $('.tab-pane').addClass('fade');
});