<template>
  <!-- https://codepen.io/sajadhsm/pen/odaBdd --->
  <section class="msger">
    <header class="msger-header">
      <div class="msger-header-title">
        Laravel soketi chat
      </div>
    </header>

    <main class="msger-chat">
      <MessageComponent v-for="(message, index) of messages" :message="message"></MessageComponent>
    </main>

    <div class="msger-inputarea">
      <input type="text" v-model="message" class="msger-input" placeholder="Enter your message...">
      <button @click="sendMessage" class="msger-send-btn">Send</button>
    </div>
  </section>
</template>

<script>
import MessageComponent from "./MessageComponent.vue";

export default {
  components: {MessageComponent},
  props: ['user'],
  data() {
    return {
      message: '',
      messages: [],
    };
  },
  methods: {
    sendMessage() {
      let message   = this.message;
      this.message  = '';
      axios.post('/chat/messages', {
          message: message,
        })
        .then((response) => {
          let message = response.data.data;
          message.direction = message.user.id == this.user.id ? 'right-msg' : 'left-msg';
          this.messages.push(message);
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  },
  mounted() {
    Echo.join(`chat`)
      .here((users) => {
        // ...
        console.table(users)
      })
      .joining((user) => {
        console.info(user.name, "joining to chat");
      })
      .leaving((user) => {
        console.info(user.name, "leaving chat");
      })
      .listen('.message.created', (message) => {
        message.direction = message.user.id == this.user.id ? 'right-msg' : 'left-msg';
        this.messages.push(message);
      })
      .error((error) => {
        console.error(error);
      });
  }
}
</script>