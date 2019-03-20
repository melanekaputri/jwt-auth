<template>
   <div>
        <b-navbar type="light" variant="light" toggleable="lg">
            <div class="container">
                <nuxt-link class="navbar-brand" to="/">Jwt-Auth</nuxt-link>

                <b-navbar-toggle target="nav_text_collapse"></b-navbar-toggle>
                <b-collapse is-nav id="nav_text_collapse">
                    <b-navbar-nav>
                        <li class="nav-item">
                            <nuxt-link class="nav-link" to="/dashboard">Dashboard</nuxt-link>
                        </li>
                    </b-navbar-nav>
                    <b-navbar-nav class="ml-auto">
                        <li class="nav-item">
                            <nuxt-link class="nav-link" to="/auth/login">Login</nuxt-link>
                        </li>
                        <li class="nav-item">
                            <nuxt-link class="nav-link" to="/auth/register">Register</nuxt-link>
                        </li>
                    </b-navbar-nav>
                </b-collapse>
            </div>
        </b-navbar>
    </div>
</template>