<template>
    <ais-index
    :app-id=id
    :api-key=secret
    :index-name=indexComplete
    :query-parameters="{
        'page': page,
        'hitsPerPage': 5
        }"
    >
        <search-header></search-header>
        <main class="search-main">
            <search-filters></search-filters>
            <search-results @loadmore="loadmore"></search-results>
        </main>
    </ais-index>
</template>


<script>
import SearchHeader from './SearchHeader'
import SearchResults from './SearchResults'
import SearchFilters from './SearchFilters'

export default {
    name: 'app',
    props: ['index', 'secret', 'id'],
    components: {
        SearchHeader,
        SearchResults,
        SearchFilters,
    },
    data () {
        return{
            page: 1
        }
    },
    mounted() {
        console.log('Component .')
    },
    computed: {
        indexComplete() {
            return `${this.index}works`
        }
    },
    methods:{
        loadmore(){
            console.log('loadmore')
            ++this.page
        }
    }
}
</script>

<style lang="scss">
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
        flex-direction: column;
        @media (min-width: 500px) {
            flex-direction: row;
        }
    }

</style>

