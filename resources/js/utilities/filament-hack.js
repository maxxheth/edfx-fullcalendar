export const filamentAddClassToCalendarSidebar = () => {

    const sidebarItems = [...document.querySelectorAll('.fi-sidebar-item')]

    console.log({ sidebarItems })
    const calendar = sidebarItems.find(item => item.textContent === 'Calendar')
    calendar.classList.add('fi-sidebar-item--calendar')

}