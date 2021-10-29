import Vue from 'vue'
import VueRouter from 'vue-router'

import PageNotFound from '../components/PageNotFound'
import AdminManagePostsPage from '../pages/admin/ManagePosts'
import AdminManageUsersPage from '../pages/admin/ManageUsers'
import AdminBackupPage from '../pages/admin/Backup'

Vue.use(VueRouter)

export default new VueRouter({
    // This CSS class will be applied on active links
    linkExactActiveClass: 'link-active',

    routes: [
        {
            path: '/admin/manage-posts',
            component: AdminManagePostsPage
        },
        {
            path: '/admin/manage-users',
            component: AdminManageUsersPage
        },
        {
            path: '/admin/backup',
            component: AdminBackupPage
        },
        {
            path: "*",
            component: PageNotFound
        }
    ]
})