<template>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted pb-1">{{subtitle}}</h6>
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: null,
        subtitle: null,
    },
}
</script>
