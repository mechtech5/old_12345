<template>
	<div class="container">
		<div class="row">
			<div class="col-3 mb-3" v-for="user in userLoop" :key="user.id">

				<div class="card">
				  <div class="card-body">
				    <h4 class="card-title">{{ user.username }}</h4>
				    <p class="card-text">{{ user.email }}</p>
				    <a href="#" @click.prevent="add(user.id)" class="card-link">Add Friend</a>
				    <!-- <a href="#" class="card-link">Accept</a> -->
				    <!-- <a href="#" class="card-link">Decline</a> -->
				  </div>
				</div>

			</div>
		</div>
	</div>
 </template>

<script>
export default{
	props: ['logged_user', 'users'],
	data(){
		return {
			userLoop: []
		}
	},
	mounted(){
		this.userLoop = this.users;
	},
	methods: {
		add(id) {
			axios.post('/add', {'receiver_id' : id}).then(response => {
				this.userLoop.forEach((v, k) => {
						if (v.id == id)
						Vue.set(this.userLoop, k, response.data);
						// Vue.swal('Task Updated!');
				});
			}).catch(error => console.log(error.response.data));
		},
		accept() {

		},
		decline() {
			// this.users = this.users.filter(u => (u.id !== user.id));
		}
	}
}
</script>