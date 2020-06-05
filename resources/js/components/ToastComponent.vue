<template>
    <h1>Toast component</h1>
<!--    <div class="p-3 bg-secondary progress-bar-striped" style="min-height: 170px;">-->
<!--        <b-button class="mb-2" variant="primary" @click="$bvToast.show('example-toast')">-->
<!--            Show toast-->
<!--        </b-button>-->
<!--        <b-toast id="example-toast" title="BootstrapVue" static no-auto-hide>-->
<!--            Hello, world! This is a toast message.-->
<!--        </b-toast>-->
<!--    </div>-->
</template>

<script>
    import {ToastPlugin } from 'bootstrap-vue';

    Pusher.logToConsole = true;

    const pusher = new Pusher('4e3b0b4dd932efc0a995', {
        cluster: 'eu',
        forceTLS: true
    });

    let channel = pusher.subscribe('my-channel');


    export default {
        name: "ToastComponent",
        components: {
            'bvToast': ToastPlugin
        },
        directives: {
            'bvToast': ToastPlugin
        },
        mounted() {
            channel.bind('my-event', data => {
                console.log(data);
                this.showNotification(data);
            });
        },
        methods: {
            showNotification(data) {
                if (typeof data.messages === 'undefined') {
                    this.$bvToast.toast('Unknown error', {
                        title: 'BootstrapVue notification',
                        autoHideDelay: 5000,
                        appendToast: false
                    });

                    return;
                }
                console.log(data.messages);

                data.messages.map((value, key) => {
                    console.log(value);
                    this.$bvToast.toast(value.message, {
                        title: 'BootstrapVue notification',
                        autoHideDelay: 5000,
                        appendToast: true
                    });
                });
            }
        }
    }
</script>

<style scoped>

</style>
