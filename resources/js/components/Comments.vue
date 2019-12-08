<template>
	<div class="pt-5">
	  <h3 class="mb-5">6 Comments</h3>
	  <ul class="comment-list">
	    <li class="comment">
	      <div class="vcard">
	        <img src="/themes/wordify/images/person_1.jpg" alt="Image placeholder">
	      </div>
	      <div class="comment-body">
	        <h3>Jean Doe</h3>
	        <div class="meta">January 9, 2018 at 2:21pm</div>
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	        <p><a href="#" class="reply rounded">Reply</a></p>
	      </div>
	    </li>

	    <li class="comment">
	      <div class="vcard">
	        <img src="/themes/wordify/images/person_1.jpg" alt="Image placeholder">
	      </div>
	      <div class="comment-body">
	        <h3>Jean Doe</h3>
	        <div class="meta">January 9, 2018 at 2:21pm</div>
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	        <p><a href="#" class="reply rounded">Reply</a></p>
	      </div>

	      <ul class="children">
	        <li class="comment">
	          <div class="vcard">
	            <img src="/themes/wordify/images/person_1.jpg" alt="Image placeholder">
	          </div>
	          <div class="comment-body">
	            <h3>Jean Doe</h3>
	            <div class="meta">January 9, 2018 at 2:21pm</div>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	            <p><a href="#" class="reply rounded">Reply</a></p>
	          </div>


	          <ul class="children">
	            <li class="comment">
	              <div class="vcard">
	                <img src="/themes/wordify/images/person_1.jpg" alt="Image placeholder">
	              </div>
	              <div class="comment-body">
	                <h3>Jean Doe</h3>
	                <div class="meta">January 9, 2018 at 2:21pm</div>
	                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                <p><a href="#" class="reply rounded">Reply</a></p>
	              </div>

	                <ul class="children">
	                  <li class="comment">
	                    <div class="vcard">
	                      <img src="/themes/wordify/images/person_1.jpg" alt="Image placeholder">
	                    </div>
	                    <div class="comment-body">
	                      <h3>Jean Doe</h3>
	                      <div class="meta">January 9, 2018 at 2:21pm</div>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                      <p><a href="#" class="reply rounded">Reply</a></p>
	                    </div>
	                  </li>
	                </ul>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </li>

	    <li class="comment">
	      <div class="vcard">
	        <img src="/themes/wordify/images/person_1.jpg" alt="Image placeholder">
	      </div>
	      <div class="comment-body">
	        <h3>Jean Doe</h3>
	        <div class="meta">January 9, 2018 at 2:21pm</div>
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	        <p><a href="#" class="reply rounded">Reply</a></p>
	      </div>
	    </li>
	  </ul>
	  <!-- END comment-list -->
	  
	  <div class="comment-form-wrap pt-5">
	    <h3 class="mb-5">Leave a comment</h3>
	    <form action="#" class="p-5 bg-light">
	      <div class="form-group">
	        <!-- <label for="message"></label> -->
	        <textarea name="" id="message" cols="30" rows="5" class="form-control" placeholder="Your Message..."></textarea>
	      </div>
	      <div class="form-group">
	        <input type="submit" value="Post Comment" class="btn btn-primary">
	      </div>

	    </form>
	  </div>
	</div>
</template>

<script>
	export default {
		props: ['logged_user', 'entity_id', 'team_id', 'comment_type'],
		data() {
			return {
				editMode: false,
				users: [],
				comment: this.emptyCommentForm(),
				comments: [],
				avatars: []
			}
		},
		created(){
			// this.getComments(this.comment_type);
		},
		mounted() {
			Echo.private(`comments.${this.team_id}`)
		    .listen('NewComment', (e) => {
	        console.log(e.comment);
	        this.comments.unshift(e.comment);
	        Vue.toasted.show(`${e.comment.user.name} has commented on a ${this.getCommentType()} in ${e.team.name} team`, {
						duration: 5000
					});
		    });
		},
		methods: {
			emptyCommentForm() {
				return {
					body: ''
				}
			},
			store() 
			{
				let postData = this.comment;
				postData.entity_id = this.entity_id;
				postData.type = this.comment_type;
				postData.user_id = this.logged_user.id;
				postData.team_id = this.team_id;

				axios.post('/pms/comments', postData).then(response => {
					console.log(response.data);
					this.comment = this.emptyCommentsForm();
					this.comments.unshift(response.data);
				}).catch(error => console.log(error.response.data));
			},

			delete(id) 
			{
				if(confirm('Are you sure?'))
				{
					axios.delete(`/pms/comments/${id}`).then(response => {
						this.comments = this.comments.filter(c => (c.id !== id));
						Vue.toasted.show(response.data, {
							duration: 2000
						});
					}).catch(error => console.log(error.response.data));
				}
			}

		}
	}
</script>

