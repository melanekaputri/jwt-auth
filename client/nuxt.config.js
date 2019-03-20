import pkg from './package'

export default {
  mode: 'universal',

  /*
  ** Headers of the page
  */
  head: {
    title: pkg.name,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: pkg.description }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },

  router: {
    middleware: [
      'clearValidationErrors'
    ]
  },

  /*
  ** Global CSS
  */
  css: [
  ],

  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    './plugins/mixins/validation',
    './plugins/axios'
  ],

  auth: {
    strategies: {
      local: {
        endpoints: {
          login: {
            url : 'auth/login', method: 'post', propertyName: 'token'
          },
          user: {
            url: 'me', method: 'get', propertyName: 'data'
          },
          logout: 'logout', method: 'get'
        }
      }
    },
    redirect: {
      login: '/auth/login',
      home: '/'
    }
  },

  /*
  ** Nuxt.js modules
  */
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    'bootstrap-vue/nuxt'
    
  ],
  /*
  ** Axios module configuration
  */
  axios: {
    // See https://github.com/nuxt-community/axios-module#options
    baseURL : "http://localhost:3000/api"
  },

  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */

    extractCSS: true,
    extend(config, ctx) {
    }
  }
}
