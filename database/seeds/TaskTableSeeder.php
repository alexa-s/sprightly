<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
  public function run()
  {
    $sizes = ['XL', 'L', 'M', 'S', 'XS'];

    $this->generateInactiveTasks($sizes);
    $this->generateActiveTasks($sizes);
  }

  private function getRandomText()
  {
    $adverbs
      = [
      "appropriately",
      "assertively",
      "authoritatively",
      "collaboratively",
      "compellingly",
      "competently",
      "completely",
      "continually",
      "conveniently",
      "credibly",
      "distinctively",
      "dramatically",
      "dynamically",
      "efficiently",
      "energistically",
      "enthusiastically",
      "fungibly",
      "globally",
      "holisticly",
      "interactively",
      "intrinsically",
      "monotonectally",
      "objectively",
      "phosfluorescently",
      "proactively",
      "professionally",
      "progressively",
      "quickly",
      "rapidiously",
      "seamlessly",
      "synergistically",
      "uniquely"
    ];

    $verbs
      = [
      "actualize",
      "administrate",
      "aggregate",
      "architect",
      "benchmark",
      "brand",
      "build",
      "cloudify",
      "communicate",
      "conceptualize",
      "coordinate",
      "create",
      "cultivate",
      "customize",
      "deliver",
      "deploy",
      "develop",
      "dinintermediate disseminate",
      "drive",
      "embrace",
      "e-enable",
      "empower",
      "enable",
      "engage",
      "engineer",
      "enhance",
      "envisioneer",
      "evisculate",
      "evolve",
      "expedite",
      "exploit",
      "extend",
      "fabricate",
      "facilitate",
      "fashion",
      "formulate",
      "foster",
      "generate",
      "grow",
      "harness",
      "impact",
      "implement",
      "incentivize",
      "incubate",
      "initiate",
      "innovate",
      "integrate",
      "iterate",
      "leverage existing",
      "leverage other's",
      "maintain",
      "matrix",
      "maximize",
      "mesh",
      "monetize",
      "morph",
      "myocardinate",
      "negotiate",
      "network",
      "optimize",
      "orchestrate",
      "parallel task",
      "plagiarize",
      "pontificate",
      "predominate",
      "procrastinate",
      "productivate",
      "productize",
      "promote",
      "provide access to",
      "pursue",
      "recaptiualize",
      "reconceptualize",
      "redefine",
      "re-engineer",
      "reintermediate",
      "reinvent",
      "repurpose",
      "restore",
      "revolutionize",
      "right-shore",
      "scale",
      "seize",
      "simplify",
      "strategize",
      "streamline",
      "supply",
      "syndicate",
      "synergize",
      "synthesize",
      "target",
      "transform",
      "transition",
      "underwhelm",
      "unleash",
      "utilize",
      "visualize",
      "whiteboard"
    ];

    $adjectives
      = [
      "24/7",
      "24/365",
      "accurate",
      "adaptive",
      "alternative",
      "an expanded array of",
      "B2B",
      "B2C",
      "backend",
      "backward-compatible",
      "best-of-breed",
      "bleeding-edge",
      "bricks-and-clicks",
      "business",
      "clicks-and-mortar",
      "client-based",
      "client-centered",
      "client-centric",
      "client-focused",
      "cloud-based",
      "cloud-centric",
      "cloudified",
      "collaborative",
      "compelling",
      "competitive",
      "cooperative",
      "corporate",
      "cost effective",
      "covalent",
      "cross functional",
      "cross-media",
      "cross-platform",
      "cross-unit",
      "customer directed",
      "customized",
      "cutting-edge",
      "distinctive",
      "distributed",
      "diverse",
      "dynamic",
      "e-business",
      "economically sound",
      "effective",
      "efficient",
      "elastic",
      "emerging",
      "empowered",
      "enabled",
      "end-to-end",
      "enterprise",
      "enterprise-wide",
      "equity invested",
      "error-free",
      "ethical",
      "excellent",
      "exceptional",
      "extensible",
      "extensive",
      "flexible",
      "focused",
      "frictionless",
      "front-end",
      "fully researched",
      "fully tested",
      "functional",
      "functionalized",
      "fungible",
      "future-proof",
      "global",
      "go forward",
      "goal-oriented",
      "granular",
      "high standards in",
      "high-payoff",
      "hyperscale",
      "high-quality",
      "highly efficient",
      "holistic",
      "impactful",
      "inexpensive",
      "innovative",
      "installed base",
      "integrated",
      "interactive",
      "interdependent",
      "intermandated",
      "interoperable",
      "intuitive",
      "just in time",
      "leading-edge",
      "leveraged",
      "long-term high-impact",
      "low-risk high-yield",
      "magnetic",
      "maintainable",
      "market positioning",
      "market-driven",
      "mission-critical",
      "multidisciplinary",
      "multifunctional",
      "multimedia based",
      "next-generation",
      "on-demand",
      "one-to-one",
      "open-source",
      "optimal",
      "orthogonal",
      "out-of-the-box",
      "pandemic",
      "parallel",
      "performance based",
      "plug-and-play",
      "premier",
      "premium",
      "principle-centered",
      "proactive",
      "process-centric",
      "professional",
      "progressive",
      "prospective",
      "quality",
      "real-time",
      "reliable",
      "resource-sucking",
      "resource-maximizing",
      "resource-leveling",
      "revolutionary",
      "robust",
      "scalable",
      "seamless",
      "stand-alone",
      "standardized",
      "standards compliant",
      "state of the art",
      "sticky",
      "strategic",
      "superior",
      "sustainable",
      "synergistic",
      "tactical",
      "team building",
      "team driven",
      "technically sound",
      "timely",
      "top-line",
      "transparent",
      "turnkey",
      "ubiquitous",
      "unique",
      "user-centric",
      "user friendly",
      "value-added",
      "vertical",
      "viral",
      "virtual",
      "visionary",
      "web-enabled",
      "wireless",
      "world-class",
      "worldwide"
    ];

    $nouns
      = [
      "action items",
      "alignments",
      "applications",
      "architectures",
      "bandwidth",
      "benefits",
      "best practices",
      "catalysts for change",
      "channels",
      "clouds",
      "collaboration and idea-sharing",
      "communities",
      "content",
      "convergence",
      "core competencies",
      "customer service",
      "data",
      "deliverables",
      "e-business",
      "e-commerce",
      "e-markets",
      "e-tailers",
      "e-services",
      "experiences",
      "expertise",
      "functionalities",
      "fungibility",
      "growth strategies",
      "human capital",
      "ideas",
      "imperatives",
      "infomediaries",
      "information",
      "infrastructures",
      "initiatives",
      "innovation",
      "intellectual capital",
      "interfaces",
      "internal or organic sources",
      "leadership",
      "leadership skills",
      "manufactured products",
      "markets",
      "materials",
      "meta-services",
      "methodologies",
      "methods of empowerment",
      "metrics",
      "mindshare",
      "models",
      "networks",
      "niches",
      "niche markets",
      "nosql",
      "opportunities",
      "outside the box thinking",
      "outsourcing",
      "paradigms",
      "partnerships",
      "platforms",
      "portals",
      "potentialities",
      "rocess improvements",
      "processes",
      "products",
      "quality vectors",
      "relationships",
      "resources",
      "results",
      "ROI",
      "scenarios",
      "schemas",
      "services",
      "solutions",
      "sources",
      "strategic theme areas",
      "storage",
      "supply chains",
      "synergy",
      "systems",
      "technologies",
      "technology",
      "testing procedures",
      "total linkage",
      "users",
      "value",
      "vortals",
      "web-readiness",
      "web services",
      "virtualization"
    ];

    return $adverbs[array_rand($adverbs)] . ' ' . $verbs[array_rand($verbs)] . ' ' . $adjectives[array_rand($adjectives)] . ' ' . $nouns[array_rand($nouns)];
  }

  private function getDuration($size, $user)
  {
    switch ($user) {
      case 1: // slow developer
        return $this->getSlowDuration($size);
        break;
      case 2: // moderate developer
        return $this->getModerateDuration($size);
        break;
      case 3: // fast developer
        return $this->getFastDuration($size);
        break;
    }

    return null;
  }

  private function getSlowDuration($size)
  {
    // variation takes values between 0.0 -> 0.9
    $variation = (float) (rand(0, 9) / (float)10.0);
    switch ($size) {
      case 'XS':
        $scale = 4.0 + $variation;
        return $scale * 60 * 60; //(4h avg.)
        break;
      case 'S':
        $scale = 5.0 + $variation;
        return $scale * 60 * 60; //(5h avg.)
        break;
      case 'M':
        $scale = 6.0 + $variation;
        return $scale * 60 * 60; //(6h avg.)
        break;
      case 'L':
        $scale = 7.0 + $variation;
        return $scale * 60 * 60; //(7h avg.)
        break;
      case 'XL':
        $scale = 8.0 + $variation;
        return $scale * 60 * 60; //(8h avg.)
        break;
    }

    return null;
  }

  private function getModerateDuration($size)
  {
    $variation = (float) (rand(0, 9) / (float)10.0);
    switch ($size) {
      case 'XS':
        $scale = 2.0 + $variation;
        return $scale * 60 * 60; //(2h avg.)
        break;
      case 'S':
        $scale = 3.0 + $variation;
        return $scale * 60 * 60; //(3h avg.)
        break;
      case 'M':
        $scale = 4.0 + $variation;
        return $scale * 60 * 60; //(4.5h avg.)
        break;
      case 'L':
        $scale = 6.0 + $variation;
        return $scale * 60 * 60; //(4h avg.)
        break;
      case 'XL':
        $scale = 7.0 + $variation;
        return $scale * 60 * 60; //(7h avg.)
        break;
    }

    return null;
  }

  private function getFastDuration($size)
  {
    $variation = (float) (rand(0, 9) / (float)10.0);
    switch ($size) {
      case 'XS':
        $scale = 1.0 + $variation;
        return $scale * 60 * 60; //(1h avg.)
        break;
      case 'S':
        $scale = 2.0 + $variation;
        return $scale * 60 * 60; //(2h avg.)
        break;
      case 'M':
        $scale = 3.0 + $variation;
        return $scale * 60 * 60; //(3h avg.)
        break;
      case 'L':
        $scale = 4.0 + $variation;
        return $scale * 60 * 60; //(4h avg.)
        break;
      case 'XL':
        $scale = 5.0 + $variation;
        return $scale * 60 * 60; //(5h avg.)
        break;
    }

    return null;
  }

  private function generateInactiveTasks($sizes)
  {

    for ($user = 1; $user <= 3; $user++) {
      foreach ($sizes as $size) {
        for ($task_no = 1; $task_no <= 20; $task_no++) {

          $title = $this->getRandomText();
          $description = $this->getRandomText();
          $duration = $this->getDuration($size, $user);

          $task
            = [
            'project_id'  => 1,
            'title'       => $title,
            'description' => $description,
            'size'        => $size,
            'type'        => 'done',
            'duration'    => $duration,
            'active'      => false
          ];

          DB::table('tasks')->insert($task);
        }
      }
    }
  }

  private function generateActiveTasks($sizes)
  {
    for ($user = 1; $user <= 3; $user++) {
      foreach ($sizes as $size) {
        for ($task_no = 1; $task_no <= 1; $task_no++) {

          $title = $this->getRandomText();
          $description = $this->getRandomText();
          $duration = $this->getDuration($size, $user);

          $task
            = [
            'project_id'  => 1,
            'title'       => $title,
            'description' => $description,
            'size'        => $size,
            'type'        => 'product',
            'duration'    => 0,
            'active'      => true
          ];

          DB::table('tasks')->insert($task);
        }
      }
    }
  }


}
