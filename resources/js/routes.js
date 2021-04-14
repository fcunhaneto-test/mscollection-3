import VueRouter from "vue-router";

import Login from "./auth/Login";
import Logout from "./auth/Logout";

import Titles from "./frontend/Titles";
import TitlesAdmin from "./backend/TitlesAdmin";
import TitleStore from "./backend/TitleStore";

const routes = [
    {
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/logout',
        component: Logout,
        name: 'logout'
    },
    {
        path: '/filmes/:channel',
        component: Titles,
        name: 'movies',
        props: {table: 'movies'}
    },
    {
        path: '/admin/filmes/:channel',
        component: TitlesAdmin,
        name: 'admin-movies',
        props: {table: 'movies'}
    },
    {
        path: '/admin/filmes/store',
        component: TitleStore,
        name: 'store-movies',
    },
];

const router = new VueRouter({
    mode: "history",
    routes
})

export default router;
