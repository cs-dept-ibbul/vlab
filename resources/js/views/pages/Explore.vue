!<template>
  <div>
    <Navbar />
    <ExploreSection/>
    <AvalaibleCourses/>
    
  </div>
</template>

<script>
import Navbar from '../../components/Navbar';
import ExploreSection from '../../components/ExploreSection';
import AvalaibleCourses from '../../components/AvailableCourses';
export default {
    name: 'Home',
    components: {
      Navbar,
      ExploreSection,
      AvalaibleCourses,
    
    },
}
</script>

<style>

</style>