import Vue from 'vue'
import VueRouter from 'vue-router'

import PageNotFound from '../components/PageNotFound'
import AdminManagePostsPage from '../pages/admin/ManagePosts'
import AdminManageUsersPage from '../pages/admin/ManageUsers'
import AdminBackupPage from '../pages/admin/Backup'
import AdminLoginPage from '../pages/admin/Login'
import AdminHomePage from '../pages/admin/Home'

import { isAuthenticated } from '../api/authentication'

Vue.use(VueRouter)

export default new VueRouter({
    // This CSS class will be applied on active links
    linkExactActiveClass: 'link-active',

    routes: [
        {
            path: '/admin/login',
            alias: '/admin',
            component: AdminLoginPage
        },
        {
            path: '/admin/home',
            component: AdminHomePage,
            beforeEnter: (to, from, next) => {
                adminIsNotAuthorizedRedirect(to, from, next)
            }
        },
        {
            path: '/admin/manage-posts',
            component: AdminManagePostsPage,
            beforeEnter: (to, from, next) => {
                adminIsNotAuthorizedRedirect(to, from, next)
            }
        },
        {
            path: '/admin/manage-users',
            component: AdminManageUsersPage,
            beforeEnter: (to, from, next) => {
                adminIsNotAuthorizedRedirect(to, from, next)
            }
        },
        {
            path: '/admin/backup',
            component: AdminBackupPage,
            beforeEnter: (to, from, next) => {
                adminIsNotAuthorizedRedirect(to, from, next)
            }
        },
        {
            path: "*",
            component: PageNotFound
        }
    ]
})

const adminIsNotAuthorizedRedirect = async (to, from, next) => {
    try{
        await isAuthenticated()
        next()
    }
    catch{
        next('/admin/')
    }
}