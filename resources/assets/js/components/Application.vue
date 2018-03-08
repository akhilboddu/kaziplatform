<template>

	<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="glyphicon glyphicon-globe"></span>
             Notifications <span class="badge">{{notifications.length}}</span>
        </a>
                <ul class="dropdown-menu">
                    <li><a href="/client/applications" style="text-align:center;">View All</a></li>
                    <hr>
                    <li v-for="notification in notifications" style="padding-left:10px; padding-right:10px;">
                            <a > <strong>{{ notification.data.cluster.id}}</strong> sent you an application for the <strong>{{ notification.data.job.title}}</strong> you posted.</a>
                            <hr>
                       
                    </li> 
                    <li v-if="notifications.length == 0">
                        <a> There are no new notifications for you. </a>
                    </li>
                </ul>

        
    </li>

    

 
</template>

<script>

	export default{

		props: ['notifications']


	}
    
</script>
