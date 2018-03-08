<template>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-globe"></span>
             Notifications <span class="badge">{{notifications.length}}</span>
        </a>
                <ul class="dropdown-menu">
                    <li v-for="notification in notifications" style="padding-left:10px; padding-right:10px;">
                            <a> You received an invite from <strong>{{ notification.data.sender.name }}</strong> to join <strong>{{notification.data.cluster.id}}</strong> </a>

                            <a v-on:click="AcceptInvite(notification)" class="btn btn-success btn-small">Accept</a>

                            <a v-on:click="DeclineInvite(notification)"class="btn btn-danger btn-small">Decline</a>
                        
                    </li> 
                    <li v-if="notifications.length == 0">
                        <a> There are no new notifications </a>
                    </li>
                </ul>
        
    </li>

    

 
</template>

<script>
    export default {

        http: {
            root: '/root',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },

        props: ['notifications'],

        methods: {

            AcceptInvite: function(notification){

                var data = {
                    id: notification.id, //id of the notification
                    cluster_id: notification.data.cluster.id
                };

                axios.post('notification/accept-invite', data).then(response => {
                    window.location.href = "/student/cluster/" + notification.data.cluster.id;
                }).catch( error => {
                    console.log(error.response); //NEED THIS FOR DEBUGGING!!!
                });
            },

            DeclineInvite: function(notification){

                var data = {
                    id: notification.id, //id of the notification
                };

                axios.post('notification/reject-invite', data).then(response => {
                    window.location.href = "/student/home";
                    alert('You declined the invitation successfully.')
                }).catch( error => {
                    console.log(error.response); //NEED THIS FOR DEBUGGING!!!
                });
            }

        }

    }
</script>
