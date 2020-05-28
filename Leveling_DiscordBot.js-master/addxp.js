const Command = require("../modules/Command.js");
const dl = require('discord-leveling');

class addxp extends Command {
  constructor(client) {
    super(client, {
      name = "addxp",
      description = "Ajoute de l'xp a la personne mentionné.",
      category = "Level",
      permLevel = "admin"
    });
  }

  async run(message, args) {
            var amount = args[0]
            var user = message.mentions.users.first() || message.author
            let balance = dl.Fetch(user.id)
            var output = await dl.addXp(user.id, amount)
            message.channel.send(`Salut ${user.tag}! Vous avez maintenant ${balance} xp!`);
           }
}   
module.exports = addxp