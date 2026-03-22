---
agent: agent
description: "Update AI development logs after completing work"
---

# Update AI Logs

After completing a work session, update the following files in `docs/ai/`:

## Steps

1. **Read current state**: Open `docs/ai/session-notes.md` to understand what was last recorded.

2. **Append to activity log** (`docs/ai/activity-log.md`):
   - Add a new dated section: `## YYYY-MM-DD — Session N`
   - List tasks completed with checkmarks
   - Note any blockers or issues

3. **Update session notes** (`docs/ai/session-notes.md`):
   - Overwrite the "Current State" section with what was just completed
   - Update "Next Steps" with what should be done next
   - List any open questions or decisions needed

4. **Register new files** (`docs/ai/files-registry.md`):
   - Add rows for every new file created
   - Format: `| path | status | purpose | date |`
   - Status: `✅ Done`, `🔄 In Progress`, `⏳ Planned`

5. **Log errors** (`docs/ai/error-log.md`) — only if errors were encountered:
   - Error description
   - Root cause
   - Solution applied
   - Prevention notes

6. **Log decisions** (`docs/ai/decisions.md`) — only if new decisions were made:
   - Decision title
   - Context / alternatives considered
   - Rationale
   - Date

7. **Update phase checklist** (`docs/plan/phase-*.md`):
   - Mark completed items with `[x]`
   - Add notes for partially completed items
