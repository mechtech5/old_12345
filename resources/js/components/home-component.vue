<template>
	<p>The Home Feed of {{ logged_user.username }}</p>
 </template>

<script>
export default{
	props: ['logged_user']
}
</script>