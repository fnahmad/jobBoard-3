<template>
  <div class="search-results">
    <ais-results>
      <template slot-scope="{ result }">
        <div class="search-results__card">
          <div class="card__image">

          </div>
          <div class="card__infos">
            <h3>{{ result.name }}</h3>
            <p>{{ result.content }}</p>
            <result-date :start="result.start_at" :end="result.end_at"></result-date>
          </div>
          <div class="card__contact">
          </div>
        </div>
      </template>
    </ais-results>    
  </div>
</template>

<script>

import moment from 'moment'
import ResultDate from './ResultDate'

export default {
  components: {
    ResultDate
  }
}
</script>

<style lang="scss">
.search-results{
  flex-grow: 2;
  
  &__card{
    width: 100%;
    padding: 15px 20px;
    margin-bottom: 20px;
    background: var(--white);
    box-shadow: 0px 5px 10px rgba(0, 0, 0, .05);
    display: flex;
    flex-direction: row;
    .card__image{
      width: 100px;
      height: 100px;
      background: linear-gradient(to right, #da4453, #89216b);
    }
    .card__infos{
      h3{
        font-size: 1.8rem;
      }
      p{
        font-size: 1.6rem;
      }
    }
    .card__contact{
      .date{

      }
    }
  }
}

</style>

// title
// content
// avatar
// start_at
// budget