<script setup>
</script>

<template>
    <div>
        <header>
            <nav>
                <div class="space-x-6">
                    <Link href="/" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Home'}">Home</Link>
                </div>
                <div v-if="$page.props.auth.user" class="space-x-6">
                    <img class="avatar" :src="$page.props.auth.user.avatar ? ('storage/' + $page.props.auth.user.avatar) : ('storage/avatars/default.png')" alt="">
                    <Link href="/dashboard" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Dashboard'}">Dashboard</Link>
                    <Link href="/logout" method="post" as="button" type="button" class="nav-link">Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link href="/register" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Register'}">Register</Link>
                    <Link href="/login" class="nav-link" :class="{'bg-slate-700' : $page.component === 'Auth/Login'}">Login</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot />
        </main>
    </div>
</template>