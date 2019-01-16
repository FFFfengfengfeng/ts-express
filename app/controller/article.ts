import { Controller } from 'egg';

export default class ArticleController extends Controller {
    public async list() {
        const { ctx } = this;

        console.log(1);

        const list = await ctx.service.article.list();
    
        console.log(list);

        ctx.body = list;
    }
}
