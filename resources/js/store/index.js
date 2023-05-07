import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)  // vue использовала библиотеку vuex

// state - хранилище состояния, здесь будут хранится все данные
// mutations - аналог сетеров, будут записоваться новые переменные и значения
// getters - используется для вычисляемых свойств
// actions - предназначен для ассинхроных запросов к серверу
export default new Vuex.Store({
    state: {
        article: {
            comments: [],
            tags: [],
            statistic: {
                views: 0,
                likes: 0
            }
        },
        slug: '',
        likeIt: true,
        commentSuccess: false,
        errors: []
    },

    actions: {
        getArticleData(context, payload) {
            console.log('context:' , context);
            console.log('context:' , payload);
            axios.get('/api/article-json', {params: {slug:payload}}).then((response) => {
                context.commit('SET_ARTICLE', response.data.data);
            }).catch(() => {
                console.log('Error');
            });
        },
        viewsIncrement(context, payload){
            setTimeout(() => {
                axios.put('/api/article-views-increment',  {slug:payload }).then((response) =>{
                    context.commit('SET_ARTICLE', response.data.data)
                }).catch(()=>{
                    console.log('Ошибка')
                });
            }, 5000)
        },
        addLike(context, payload){
            axios.put('/api/article-likes-increment', {slug:payload.slug, increment:payload.increment }).then((response) =>{
                context.commit('SET_ARTICLE', response.data.data)
                context.commit('SET_LIKE', !context.state.likeIt)
            }).catch(()=>{
                console.log('Ошибка addLike')
            });
            console.log("После клика по кнопке", context.state.likeIt)
        },
        addComment(context, payload) {
            axios.post('/api/article-add-comment', { subject:payload.subject, body:payload.body, article_id:payload.article_id}).then((response) =>{
                context.commit('SET_COMMENT_SUCCESS', !context.commentSuccess)
            }).catch(() =>{
                console.log('Ошибка addComment')
            });
        }
    },

    getters: {
        articleViews(state) {
            return state.article.statistic.views;

        },

        articleLikes(state) {
            return state.article.statistic.likes;
        }
    },

    mutations: {
        SET_ARTICLE(state, payload) {
            return state.article = payload;
        },
        SET_SLUG(state, payload) {
            return state.slug = payload;
        },
        SET_LIKE(state, payload) {
            return state.likeIt = payload;
        },
        SET_COMMENT_SUCCESS(state, payload) {
            state.commentSuccess = payload;
        }
    }
})
