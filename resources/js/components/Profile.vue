<template>
	<p>The Profile Page of {{ logged_user.username }}</p>
 </template>

<script>
export default{
	props: ['logged_user']
}
</script>