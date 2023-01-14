import { createRouter, createWebHistory } from 'vue-router'
// import HeloWorld from '@/components/HelloWorld';
import HomePage from '@/components/Home.vue';
import PasienPage from '@/pages/PasienView/Pasien.vue';
import PasienRegisterPage from '@/pages/PasienView/Create.vue';
import Kelurahan from '@/pages/Kelurahan.vue';
import KelurahanCreatePage from '@/pages/KelurahanView/Create.vue';
import CardPagePasien from '@/components/Pasien/CardPasienComponent.vue';
import Auth from '@/pages/Auth/Login.vue';
import PageNotFound from '@/pages/404/PageNotFound';
import EditKelurahanPage from '@/pages/KelurahanView/EditKelurahan';
// @ts-ignore
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'dashboard', // dashboard
      component: HomePage,
    },
    {
        path: '/pasien',
        name: 'pasien',
        component: PasienPage,
        meta: {
          requiresOperator: true,
          requiresAuth: true,
        }
    },
    {
      path: '/pasien/register',
      name: 'pasien-register',
      component: PasienRegisterPage,
      meta: {
        requiresOperator: true,
        requiresAuth: true,
      }
  },
  {
    path: '/pasien/get',
    name: 'pasien-slug',
    component: CardPagePasien,
    props: true,
    meta: {
      requiresOperator: true,
      requiresAuth: true,
    }
},
    {
      path: '/kelurahan',
      name: 'kelurahan',
      component: Kelurahan,
      meta: {
        requiresAuth: true,
      }
  },
  {
    path: '/kelurahan/create',
    name: 'kelurahan-manage',
    component: KelurahanCreatePage,
    meta: {
      requiresAuth: true,
    }
  },
  {
    path: '/kelurahan/edit/:id',
    name: 'kelurahan-edit',
    component: EditKelurahanPage,
    meta: {
      requiresAuth: true,
    },
},
{
  path: '/login',
  name: 'login',
  component: Auth,
},

    // { path: '*', component: PageNotFound }
    { path: '/:pathMatch(.*)*', component: PageNotFound },
  ]
})

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (localStorage.getItem("role") == null) {
      next({
        path: "/login",
        params: { nextUrl: to.fullPath },
      });
    } else {
      const role = localStorage.getItem("role")
      if (role === 1) {
        next();
      } else {
        next();
      }
    }
  } else if (to.matched.some(record => record.meta.requiresOperator)) {
    if (localStorage.getItem("role") == null) {
      next({
        path: "/login",
        params: { nextUrl: to.fullPath },
      });
    } else {
      const role = localStorage.getItem("role")
      if (role === 2) {
        next();
      } else {
        next({name: 'pasien-register'});
      }
    }
  } else if (to.matched.some(record => record.meta.guest)) {
    if (localStorage.getItem('role') == null) {
      next()
    } else {
      next({ name: 'dashboard' })
    }
  } else {
    next();
  }
});


export default router