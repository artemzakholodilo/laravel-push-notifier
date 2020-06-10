<template>
</template>

<script>
    import {ToastPlugin} from 'bootstrap-vue';

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

                data.messages.map((value, key) => {
                        setTimeout(() => {
                            this.$bvToast.toast(value.message, {
                                title: 'BootstrapVue notification',
                                autoHideDelay: 5000,
                                appendToast: true
                            })
                        }, 2000);
                    }
                );
            }
        }
    }
</script>

<style scoped>

</style>
