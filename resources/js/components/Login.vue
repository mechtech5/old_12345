<template>
	<div>
		<form action="">
			<div class="form-group">
				<input type="text" v-model="username" class="form-control" placeholder="Username">
			</div>
			<div class="error" v-if="!$v.username.required">Username is required.</div>
			<div class="error" v-if="!$v.username.minLength">Username must be least {{ $v.username.$params.minLength.min }} letters.</div>


			<div class="form-group">
				<input type="email" v-model="email" class="form-control" placeholder="Email">
			</div>
			<div class="error" v-if="!$v.email.required">Email is required.</div>

			<div class="form-group" :class="{ 'form-group--error': $v.password.$error }">
				<input type="password" class="form-control" v-model.trim="$v.password.$model" placeholder="Password">
			</div>
			<div class="error" v-if="!$v.password.required">Password is required.</div>
  		<div class="error" v-if="!$v.password.minLength">Password must have at least {{ $v.password.$params.minLength.min }} letters.</div>

			<div class="form-group" :class="{ 'form-group--error': $v.repeatPassword.$error }">
		    <input type="password" class="form-control" v-model.trim="$v.repeatPassword.$model" placeholder="Repeat Password" />
		  </div>
		  <div class="error" v-if="!$v.repeatPassword.sameAsPassword">Passwords must be identical.</div>
		  <!-- <tree-view :data="$v" :options="{rootObjectKey: '$v', maxDepth: 2}"></tree-view> -->


			<div class="form-group">
				<input type="submit" class="form-control">
			</div>
		</form>
	</div>
</template>

<script>
	import Vuelidate from 'vuelidate'
	import { required, minLength, maxLength, email, sameAs } from 'vuelidate/lib/validators'
	Vue.use(Vuelidate)

	export default {
		data() {
		    return {
		      username: '',
		      email: '',
		      password: '',
      		repeatPassword: ''
		    }
		  },
		  validations: {
		    username: {
		      required,
		      minLength: minLength(3),
		      maxLength: maxLength(16),
		    },
		    email: {
		    	required,
		    	email
		    },
		    password: {
		      required,
		      minLength: minLength(8)
		    },
		    repeatPassword: {
		      sameAsPassword: sameAs('password')
		    }
		  }
	}
</script>