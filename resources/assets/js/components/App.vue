<template>
    <ais-index
    :app-id=id
    :api-key=secret
    :index-name=indexComplete
    >
        <search-header></search-header>
        <main class="search-main">
            <search-filters></search-filters>
            <search-results></search-results>
        </main>
    </ais-index>
</template>


<script>
import SearchHeader from './SearchHeader'
import SearchResults from './SearchResults'
import SearchFilters from './SearchFilters'

export default {
    props: ['index', 'secret', 'id'],
    components: {
        SearchHeader,
        SearchResults,
        SearchFilters,
    },
    data () {
        return{

        }
    },
    mounted() {
        console.log('Component .')
    },
    computed: {
        indexComplete() {
            return `${this.index}works`
        }
    }
}
</script>

<style>
    html,body,:root{
        font-size: 62.5%;
        --white: #ffffff;
        --black: #000000;
        --grey: #8b8b8b;
        --light-grey: #cfcfcf;
        --main-font: 'Roboto', Helvetica, sans-serif;
        background: #F2F5F6;
        font-family: var(--main-font);
    }

    *, *::after, *::before{
        box-sizing: border-box;
    }

    .search-main{
        padding: 50px 7.5vw;
        width: 100%;
        display: flex;
        flex-direction: row;
    }

</style>

