<script setup>
import { ref } from 'vue'
import HeaderComponent from "@/components/StartPage/headerComponent.vue";
import ContentComponent from "@/components/StartPage/ContentComponent.vue";
import SideBarComponent from "@/components/StartPage/SideBarComponent.vue";

</script>

<template>
    <div class="container-fluid">
        <header-component></header-component>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-9">
                <content-component></content-component>
            </div>
            <div class="col-3">
                <side-bar-component></side-bar-component>
            </div>
        </div>
    </div>
</template>
