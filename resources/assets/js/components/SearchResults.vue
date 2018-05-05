<template>
  <div class="search-results">
    <ais-results>
      <template slot-scope="{ result }">
        <div class="search-results__card">
          <div class="card__image">

          </div>
          <div class="card__infos">
            <h3>
              {{ result.title }}
              <result-people-count :count="result.people"></result-people-count>
            </h3>
            <p>{{ result.content }}</p>
          </div>
          <div class="card__more">
            <result-date v-if="result.start_at" :start="result.start_at" :end="result.end_at"></result-date>
            <p class="result-budget" v-if="result.budget">
              {{budgetFormat(result.budget)}}€
            </p>
            <div class="contact__clipboards">
              <h4>{{result.contact_name}}</h4>
              <result-clipboard v-if="result.contact_email" :label="result.contact_email"></result-clipboard>
              <result-clipboard v-if="result.contact_phone" :label="phoneFormat(result.contact_phone)"></result-clipboard>
            </div>
          </div>
          <ul class="card__skills" v-if="result.skills.length > 0">
            <li v-for="skill in result.skills" :key="skill.id">{{skill}}</li>
          </ul>
        </div>
      </template>
    </ais-results>    
  </div>
</template>

<script>

import ResultDate from './ResultDate'
import ResultClipboard from './ResultClipboard'
import ResultPeopleCount from './ResultPeopleCount'

export default {
  components: {
    ResultDate,
    ResultClipboard,
    ResultPeopleCount,
  },
  methods: {
    budgetFormat(nbr) {
      return nbr.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    },
    phoneFormat(phone) {
      return phone.toString().replace(/\B(?=(\d{2})+(?!\d))/g, " ");      
    }
  }
}
</script>

<style lang="scss">
.search-results{
  flex-grow: 2;
  
  &__card{
    width: 100%;
    padding: 15px 15px;
    margin-bottom: 20px;
    background: var(--white);
    box-shadow: 0px 5px 10px rgba(0, 0, 0, .05);
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    font-size: 1.6rem;    
    .card__image{
      width: 150px;
      height: 150px;
      background: linear-gradient(to right, #da4453, #89216b);
      flex-shrink: 0;      
    }
    .card__infos{
      width: auto;
      margin: 0 15px;
      h3{
        font-size: 2rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 15px;
      }
      p{
        font-size: 1.6rem;
        line-height: 1.5;
        color: var(--grey);  
        margin: 0;      
      }
    }
    .card__more{
      margin-left: auto;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      margin-left: auto;
      flex-shrink: 0;
      .result-date, .result-budget{
        text-align: right;
        text-transform: uppercase;
        font-size: 1.4rem;
        color: var(--grey);
      }
      .contact__clipboards{
        margin-top: auto;
        h4{
          text-align: right;
          font-size: 1.6rem;
          font-weight: 600;
        }
      }
    }
    .card__skills{
      flex-shrink: 0;
      width: 100%;
      list-style: none;
      padding: 0;
      margin: 15px 0 0 0;
      display: flex;
      flex-direction: row;
      li{
        background: var(--light-grey);
        padding: 5px 15px;
        color: var(--white);
        margin-right: 15px;
        text-transform: uppercase;
        font-size: 1.3rem;
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