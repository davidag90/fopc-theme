// Get the current URL
const currentURL = window.location.href;
const tabList = [].slice.call(document.querySelectorAll('#fopc-tabs a'));

document.addEventListener('DOMContentLoaded', createTabs(tabList));

// Check if the URL contains a hashtag
if(currentURL.includes("#")) {
    const urlHash = window.location.hash;

    document.addEventListener('DOMContentLoaded', fireInitTab(urlHash, tabList));
}

function fireInitTab(urlHash, tabList) {
    tabList.forEach(triggerEl => {
        triggerEl.classList.remove('active');
        triggerEl.classList.remove('show');
    });

    let triggerLink = triggerEl.getAttribute('href');

    if(triggerLink === urlHash) {
        triggerEl.classList.add('active');
        triggerEl.classList.add('show');
    }
}

function createTabs(tabList) {
    tabList.forEach(triggerEl => {
        let tabTrigger = new bootstrap.Tab(triggerEl);
    
        triggerEl.addEventListener('click', function (event) {
            event.preventDefault();
            tabTrigger.show();
        });
        
        triggerEl.classList.add('fade');
    });
}