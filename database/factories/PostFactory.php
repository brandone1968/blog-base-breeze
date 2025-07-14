<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'post' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }


// Ecco cosa fa il metodo withTags:
// 1. **afterCreating**: È un metodo che permette di eseguire del codice subito dopo che un modello (in questo caso, un `Post`) è stato creato nel database tramite la factory.
// 2. **$post->tags()**: Si riferisce alla relazione tra il modello `Post` e il modello `Tag` (probabilmente una relazione molti-a-molti).
// 3. **Tag::factory()->count(3)->create()**: Crea 3 nuovi tag usando la factory del modello `Tag`.
// 4. **attach(...)**: Collega i 3 tag appena creati al post tramite la tabella pivot della relazione molti-a-molti.
// **In sintesi:**
// Ogni volta che crei un post con la factory, questo codice crea anche 3 tag e li associa automaticamente al post. Questo è utile per i test o per popolare il database con dati di esempio realistici.
// **Gotcha:**
// Se usi questo codice spesso, potresti creare molti tag duplicati nel database, perché ogni post avrà 3 nuovi tag unici. Se vuoi riutilizzare tag esistenti, dovresti modificarlo.

public function withTags(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->tags()->attach(Tag::factory()->count(3)->create());
        });
    }
}
