<template>
	<form class="row">
		<div class="col-3">
			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action text-center">My Profile</a>
			  <button type="button" class="list-group-item list-group-item-action active">Social Info</button>
			  <button type="button" class="list-group-item list-group-item-action" disabled>Author Info</button>
			  <button type="button" class="list-group-item list-group-item-action" disabled>Dev Info</button>
			  <button type="button" class="list-group-item list-group-item-action" disabled>Job Info</button>
			  <button type="button" class="list-group-item list-group-item-action" disabled>Gamer Info</button>
			</div>
		</div>
		<div class="col-6 text-center">
			<div class="row">
				<div class="form-group col-4">
					<label for="">First Name</label>
					<input type="text" v-model="base_profile.fname" class="form-control" placeholder="Elon">
				</div>
				<div class="form-group col-4">
					<label for="">Last Name</label>
					<input type="text" v-model="base_profile.lname" class="form-control" placeholder="Musk">
				</div>
				<div class="form-group col-4">
					<label for="">Date of Birth</label>
					<flat-pickr class="form-control" v-model="base_profile.dob" 
						:config="dateConfig"></flat-pickr>
				</div>
				<div class="form-group col-12">
					<label>Short Bio</label>
					<textarea v-model="base_profile.bio" class="form-control" cols="10" rows="5"></textarea>
				</div>
				<div class="form-group col-12">
					<button class="btn btn-outline-success">Update</button>
				</div>
			</div>
		</div>
		<div class="col-3 text-center">
			<croppa v-model="myCroppa" :width="256" :height="256" :initial-image="user_img"></croppa>
			<button class="btn btn-outline-primary btn-sm" @click="uploadCroppedImage">Set Avatar</button>	 
		</div>
	</form>
 </template>

<script>
import Croppa from 'vue-croppa';
import 'vue-croppa/dist/vue-croppa.css';
import flatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';
Vue.use(Croppa);

export default{
	props: ['logged_user', 'user_img'],
	components: {
  	flatPickr,
  },	
	data() {
		return {
			base_profile: this.emptyBaseProfile(),
			avatar: '',
			myCroppa: {},
			dateConfig:{dateFormat: "m-d-Y"},
		}
	},
	methods: {
		emptyBaseProfile(){
			return {
				'fname': '',
				'lname': '',
				'gender': '',
				'dob': null,
				'bio': ''
			}
		},
		uploadCroppedImage() {
			var base64 = this.myCroppa.generateDataUrl();
			window.axios.post('/user/profile/set_avatar', {file: base64}).then(response => {
      	console.log(response.data);
      	this.avatar = response.data;
      	Vue.swal('Picture Updated!');
      }).catch(error => console.log(error.response));
    }
	}
}
</script>