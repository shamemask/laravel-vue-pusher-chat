<template>
<div class="dashboard">
  <Header />
  <main>
    <Toolbar :toggleForm="toggleForm"  />
    <Team :users="users" :toggleForm="toggleForm" :fetchUsers="fetchUsers" :toggleChat="toggleChat"/>
    <UserForm v-if="formActive" :toggleForm="toggleForm" :fetchUsers="fetchUsers" :userId="userId" :toggleChat="toggleChat" :ChatActive="ChatActive" />
    
  </main>
</div>
</template>

<script>
import {ref} from 'vue';
import APIController from '@/controllers/api';

import Header from '@/components/Header';
import Toolbar from '@/components/Toolbar';
import Team from '@/components/Team';
import UserForm from '@/components/UserForm';


export default {
  name: 'App',
  components: {
    Header,
    Toolbar,
    Team,
    UserForm
  },
  setup(){
    const users = ref([]);
    const formActive = ref(false);
    const ChatActive = ref(false);
    const userId = ref(false);

    const fetchUsers = async () => {
      users.value = await APIController.FetchUsers();
    }

    const toggleForm = (id = false) => {
      formActive.value = !formActive.value;
      ChatActive.value = false;
      userId.value = false;
      if(id){
        userId.value = id;
      }
    }

    const toggleChat = (id = false) => {
      toggleForm(id);
      ChatActive.value = true;
      
    }

    return{
      users,
      fetchUsers,
      formActive,
      toggleForm,
      toggleChat,
      ChatActive,
      userId
    }
  },
  mounted(){
    this.fetchUsers();
  }
}
</script>

<style>
:root {
  --primary:#8a4cfc;
  --primary-alt: #702fe7;
  --ligth: #eeeeee;
  --ligth-alt: #f8f8f8;
  --grey: #888888;
  --dark: #131a26;
}

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Fira sans", sans-serif;
}

body{
  background-color: var(--ligth);
}

main{
  width: 100vw;
  overflow: hidden;
}

input, button{
  appearance: none;
  outline: none;
  border: none;
  background: none;
}

.button{
  display: inline-block;
  padding: 8px 16px;
  background-color: var(--primary);
  color: #fff;
  font-size: 20px;
  font-weight: 700;
  text-transform: uppercase;
  cursor: pointer;
  border-radius: 6px;
  transition: 0.4s;
}

.button:hover{
  background-color: var(--primary-alt);
}

.button.button-outline{
  background-color: transparent;
  border: 2px solid var(--primary);
  padding: 6px 14px;
  color: var(--primary);
}

.button.button-outline:hover{
  color: #fff;
  background-color: var(--primary);
}

.button.button-small{
  padding: 4px 8px;
  font-size: 18px;
  font-weight: 600;
}

.button.button-alert{
  background-color: crimson;
}

.button.button-chat{
  background-color: green;
}

.button-group{
  display: flex;
  margin: 0 -8px;
}

.button-group.group-end{
  justify-content: flex-end;
}

.button-group .button{
  margin: 0px 8px;
}
</style>
