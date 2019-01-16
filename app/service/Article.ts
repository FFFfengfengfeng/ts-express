import { Service } from 'egg';

export default class Article extends Service {
    
    /**
     * 文章列表
     */
    public async list() {
        const list = await this.app.mysql.query('select * from articles');

        return list;
    }
}