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
						<input type="text" class="form-control mb-1" placeholder="Title">
						<vue-editor id="editor1" v-model="content" :editorToolbar="customToolbar"></vue-editor>
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

	export default {
		props: ['logged_user'],
		components: {
    	VueEditor
		},
		data() {
			return {
				content: "",
				customToolbar: [["bold", "italic", "underline"], [{ list: "ordered" }, { list: "bullet" }], ["image", "code-block"]]
			}
		}
	}
</script>

<style>
	#editor1 {
		/*min-height: 120px;*/
	}
</style>