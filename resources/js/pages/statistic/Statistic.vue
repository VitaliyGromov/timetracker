<template>
    <h1>
        Statistic
    </h1>
    <UsersTable/>
</template>

<script>
import UsersTable from "../../components/Statistic/UsersTable.vue";
import Loader from "../../components/Loader/Loader.vue";

export default {
    components: {Loader, UsersTable},

    data(){
        return {
            loading: true
        }
    }
}
</script>
