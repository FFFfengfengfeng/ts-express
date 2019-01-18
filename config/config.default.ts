import { EggAppConfig, EggAppInfo, PowerPartial } from 'egg';

export default (appInfo: EggAppInfo) => {
    const config = {} as PowerPartial<EggAppConfig>;

    // override config from framework / plugin
    // use for cookie sign key, should change to your own and keep security
    config.keys = appInfo.name + '_1547605641983_4639';

    // add your egg config in here
    config.middleware = [];

    // config for egg-mysql
    config.mysql = {
        client: {
            host: '127.0.0.1',
            port: '3306',
            user: 'root',
            password: '',
            database: 'xf'
        },
        app: true,
        agent: false
    }

    // config for csrf
    config.security = {
        xframe: {
            enable: false
        },
        csrf: {
            enable: false
        },
        domainWhiteList: [ 'http://localhost:4200' ]
    } 

    // config for egg-sequelize
    // config.sequelize = {
    //     dialect: 'mysql',
    //     host: '127.0.0.1',
    //     port: '3306',
    //     user: 'root',
    //     password: '',
    //     database: 'blog'
    // }

    // add your special config in here
    const bizConfig = {
        sourceUrl: `https://github.com/eggjs/examples/tree/master/${appInfo.name}`,
    };

    // the return config will combines to EggAppConfig
    return {
        ...config,
        ...bizConfig,
    };
};
