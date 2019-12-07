<template>
	<div class="container">
		<div class="row">
			<div class="col-8 pl-5">
				<div class="card mb-2">
					<div class="card-body">
						<!-- <div class="row text-center">
							<div class="col-4">
								<p class=""><i class="fa fa-commenting-o" aria-hidden="true"></i> Post</p>
							</div>
							<div class="col-4">
								<p><i class="fa fa-picture-o" aria-hidden="true"></i> Image & Video</p>
							</div>
							<div class="col-4">
								<p><i class="fa fa-link" aria-hidden="true"></i> Link</p>
							</div>
						</div> -->
						<input type="text" class="form-control mb-1" v-model="post.title" placeholder="Title">
						<vue-editor v-model="post.body" :editorToolbar="customToolbar"></vue-editor>
						<div class="row mt-3">
							<div class="col-8">
							</div>
							<div class="col-4">
								<span v-if="logged_user">
									<!-- <button type="button" class="float-right btn btn-sm btn-outline-success"></button> -->
									<button type="button" class="float-right btn btn-sm btn-outline-light text-dark">Save Draft</button>
									<button type="button" class="float-right btn btn-sm btn-success mr-2">Post</button>
								</span>
								<span v-else>
									<button type="button" class="float-right btn btn-sm btn-primary">Login to Post</button>
								</span>
							</div>
						</div>
						
					</div>
				</div>
				<div class="card mb-2">
					<div class="card-body">
						<Login />
					</div>
				</div>
			</div>
			<div class="col-4 pr-5">
				<div class="card">
					<div class="card-body">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</template>	

<script>
	import { VueEditor } from "vue2-editor";
	import Register from '../components/Register';
	import Login from '../components/Login';

	export default {
		props: ['logged_user', 'posts'],
		components: {
    	VueEditor, Login, Register
		},
		data() {
			return {
				feed: [],
				post: this.emptyPostForm(),
				content: "",
				customToolbar: [["bold", "italic", "underline"], [{ list: "ordered" }, { list: "bullet" }], ["code-block"]]
			}
		},
		mounted() {
			// this.posts = this.feed;
		},
		methods: {
			emptyPostForm() {
				return {
					'title': '',
					'body': ''
				}
			},
			// index(){
			// 	axios.post('/api/social/posts', {

			// 	}).then(response => {

			// 	}).catch(error => console.log(error.response.data));
			// }
		}
	}
</script>

<style scoped>
	.ql-editor{
		height: 80px !important;
	}
</style>