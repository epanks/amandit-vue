import Home from './components/Home.vue';
import Login from './components/auth/Login.vue';
import PaketMain from './components/paket/Main.vue';
import PaketList from './components/paket/List.vue';

export const routes = [{
        path: '/',
        component: Home,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/paket',
        component: PaketMain,
        meta: {
            requiresAuth: true
        },
        children: [{
                path: '/',
                component: PaketList
            }
            // {
            //     path: 'new',
            //     component: NewPaket
            // },
            // {
            //     path: ':id',
            //     component: Paket
            // },
        ]
    }
]
