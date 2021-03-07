<template>
  <div>
    <Navbar />
    <Section/>
    <SponsorSection/>
    
  </div>
</template>

<script>
import Navbar from '../../components/Navbar';
import Section from '../../components/Section';
import SponsorSection from '../../components/SponsorSection';


export default {
    name: 'Home',
    components: {
      Navbar,
      Section,
      SponsorSection,
    },
}
</script>

<style>

</style>