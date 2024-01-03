<template>
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">{{buttonName}}</button>

    <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_title">{{ header }}</h5>
                    <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        buttonName: null,
        header: null,
    },

    data(){
        return {
            modal: null,
        }
    },

    mounted() {
        this.modal = new bootstrap.Modal(document.getElementById('modal'), {
            keyword: false
        });
    },

    methods: {
        hideModal(){
            this.modal.hide();
        }
    }
}
</script>
