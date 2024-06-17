<template>
    <div>
      <audio ref="audioPlayer" controls :src="musicSrc" @loadeddata="handleLoaded">
        Your "browser" does not support the audio element.
      </audio>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        musicSrc: null
      };
    },
    mounted() {
      this.fetchMusic();
    },
    methods: {
      fetchMusic() {
        this.musicSrc = '/storage/music/generic.mp3';
      },
      handleLoaded() {
        console.log('Music is loaded and can be played.');
      }
    }
  }
  </script>
