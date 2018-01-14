$(document).foundation();

var name = 'Projet Piscine';
var short_name = 'P';
var sidebar_expanded;

var collapseSidebar = function () {
    $('.sidebar-menu-text').css('display', 'none');
    $('#sidebar').css('width', 'auto');
    $('.topbar-left .title').text(short_name);
    $('.topbar-left').css('width', 'auto');
};

var expandSidebar = function () {
    $('.sidebar-menu-text').css('display', 'inline');
    $('#sidebar').css('width', '200px');
    $('.topbar-left .title').text(name);
    $('.topbar-left').css('width', '200px');
};

if ($.session.get('sidebar_expanded') === 'false') {
    sidebar_expanded = false;
    collapseSidebar();
} else {
    sidebar_expanded = true;
    expandSidebar();
}
$('body').removeClass('hide');
$('#toggle-sidebar-btn').click(function() {
    if (sidebar_expanded) {
        sidebar_expanded = false;
        $.session.set('sidebar_expanded', sidebar_expanded);
        return collapseSidebar();
    } else {
        sidebar_expanded = true;
        $.session.set('sidebar_expanded', sidebar_expanded);
        return expandSidebar();
    }
});

