<template>
  <div class="msg" :class="message.direction">
    <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>

    <div class="msg-bubble">
      <div class="msg-info">
        <div class="msg-info-name">{{ message.user.name }}</div>
        <div class="msg-info-time">{{ message.created_at }}</div>
      </div>

      <div class="msg-text">
        {{ message.message }}
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ['message']
}
</script>