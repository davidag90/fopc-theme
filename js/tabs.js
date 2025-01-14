function fireInitTab(urlHash, tabList) {
    tabList.forEach(triggerEl => {
        let triggerLink = triggerEl.getAttribute('href');
        
        const tabTrigger = new bootstrap.Tab(triggerEl);
    
        if(triggerLink === urlHash) {
            tabTrigger.show();
        }
    });
}

function createTabs(tabList) {
    tabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl);
    
        triggerEl.addEventListener('click', function (event) {
            event.preventDefault();
            tabTrigger.show();
        });
    });
}

const currentURL = window.location.href;
const tabList = [].slice.call(document.querySelectorAll('#fopc-tabs a'));

if(currentURL.includes("#")) {
    const urlHash = window.location.hash;

    document.addEventListener('DOMContentLoaded', fireInitTab(urlHash, tabList));
}

document.addEventListener('DOMContentLoaded', createTabs(tabList));