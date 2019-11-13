<template>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-3 mb-3" v-for="user in userLoop" :key="user.id">

				<div class="card">
				  <div class="card-body">
				    <h4 class="card-title">{{ user.username }}</h4>
				    <p class="card-text">{{ user.email }}</p>

				    <a href="#" v-if="isEmpty(user.request)" @click.prevent="add(user.id)" class="card-link">Add Friend</a>

						<span v-else-if="user.request.sender_id == user.id && user.request.accepted_at == null">
							<a href="#" @click.prevent="accept(user.request.id, user.id)" class="card-link">Accept</a>
				    	<a href="#" @click.prevent="decline(user.request.id, user.id)" class="card-link">Decline</a>
						</span>

						<a href="#" v-else-if="user.request.receiver_id == user.id && user.request.accepted_at == null">Request Sent</a>

						<a href="#" v-else-if="((user.request.receiver_id == user.id && user.request.accepted_at != null) || user.request.sender_id == user.id && user.request.accepted_at != null)">Friends</a>
				    
				  </div>
				</div>

			</div>
		</div>
	</div>
 </template>

<script>
export default{
	props: ['logged_user', 'users', 'requests'],
	data(){
		return {
			userLoop: [],
			reqLoop: []
		}
	},
	mounted(){
		this.reqLoop = this.requests;
		
		let x = this.users;
		this.reqLoop.forEach(function(r){
			x.forEach(function(u){
				if(u.id == r.sender_id || u.id == r.receiver_id) {
					u.request = r;
				}
			});
		});

		this.userLoop = x;
	},
	methods: {
		add(id) {
			axios.post('/social/add', {'receiver_id' : id}).then(response => {
				this.userLoop.forEach((v, k) => {
						if (v.id == id)
						Vue.set(this.userLoop, k, response.data);
						// Vue.swal('Request Sent!');
				});
			}).catch(error => console.log(error.response.data));
		},
		accept(id, sender_id) {
			axios.post('/social/accept', {'req_id' : id, 'sender_id': sender_id}).then(response => {
				this.userLoop.forEach((v, k) => {
						if (v.id == sender_id)
						Vue.set(this.userLoop, k, response.data);
				});
			}).catch(error => console.log(error.response.data));
		},
		decline(id, sender_id) {
			axios.post('/social/decline', {'req_id' : id, 'sender_id': sender_id}).then(response => {
				this.userLoop.forEach((v, k) => {
						if (v.id == sender_id)
						Vue.set(this.userLoop, k, response.data);
				});
			}).catch(error => console.log(error.response.data));
		},
		isEmpty(obj) {
			for(var key in obj) {
				if(obj.hasOwnProperty(key))
						return false;
			}
			return true;
		},
	}
}
</script>